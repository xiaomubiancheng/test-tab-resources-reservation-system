<?php


class TempController{


    //

    public function billadd(){

            //入库bill 返回ID
            $id = DB::table("bill")->insertGetId($bill);

            $bill_list['bill_id'] = $id;
            if($submit_status == 4){
                $s_year = substr($arr['starttime'],0,4);
                $s_month = substr($arr['starttime'],5,2);
                $s_day = substr($arr['starttime'],8,2);
                $e_year = substr($arr['endtime'],0,4);
                $e_month = substr($arr['endtime'],5,2);
                $e_day = substr($arr['endtime'],8,2);
            }else{
                $s_year = substr($arr['auto_starttime'],0,4);
                $s_month = substr($arr['auto_starttime'],5,2);
                $s_day = substr($arr['auto_starttime'],8,2);
                $e_year = substr($arr['auto_endtime'],0,4);
                $e_month = substr($arr['auto_endtime'],5,2);
                $e_day = substr($arr['auto_endtime'],8,2);
            }

            $first_info = DB::table("humtableinit2")->where([
                ['year','=',$s_year],
                ['month','=',$s_month],
                ['begin','<=',$s_day],
                ['end','>=',$s_day],
                ['ttid','=',$ttype]
            ])->first();
            $first_week_count = $first_info->week_count;
            $last_info = DB::table("humtableinit2")->where([
                ['year','=',$e_year],
                ['month','=',$e_month],
                ['begin','<=',$e_day],
                ['end','>=',$e_day],
                ['ttid','=',$ttype]
            ])->first();
            $last_week_count = $last_info->week_count;

            if($submit_status === 1){ //正常非自定义提交
                $re_manpower = $manpower;
                for($i=$first_week_count;$i<=$last_week_count;$i++){

                    if($i == $first_week_count){
                        if($first_info->remain == 0){
                            continue;
                        }
                        if($first_info->remain >= $manpower){
                            $bill_list['manpower'] = $manpower;

                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败!');
                            }

                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $manpower)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }

                            break;
                        }else{
                            $bill_list['manpower'] = $first_info->remain;
                            $re_manpower = $manpower - $first_info->remain;
                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败!');
                            }
                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $first_info->remain)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }
                        }
                    }

                    if($i>$first_week_count && $i<$last_week_count ){
                       $info =  DB::table("humtableinit2")->where([
                            ['year','=',$s_year],
                            ['ttid','=',$ttype],
                            ['week_count', $i]
                        ])->first();

                        if($info->remain == 0){
                            continue;
                        }

                       if( $info->remain >= $re_manpower ){
                           $bill_list['manpower'] = $re_manpower;
                           if(!DB::table("bill_slave")->insert($bill_list)){
                               throw new \Exception('bill_slave入库失败!');
                           }
                           if(!DB::table("humtableinit2")->where([
                               ['week_count', $i],
                               ['ttid','=',$ttype]
                           ])->decrement('remain', $re_manpower)){
                               throw new \Exception("humtableinit2数据更新失败");
                               return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                           }
                           break;
                       }else{
                           $bill_list['manpower'] = $info->remain;
                           $re_manpower = $re_manpower - $info->remain;
                           if(!DB::table("bill_slave")->insert($bill_list)){
                               throw new \Exception('bill_slave入库失败!');
                           }
                           if(!DB::table("humtableinit2")->where([
                               ['week_count', $i],
                               ['ttid','=',$ttype]
                           ])->decrement('remain', $info->remain)){
                               throw new \Exception("humtableinit2数据更新失败");
                               return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                           }
                       }
                    }

                    if($i == $last_week_count){
                        if($last_info->remain == 0){
                            continue;
                        }
                        if($last_info->remain >= $re_manpower){
                            $bill_list['manpower'] = $re_manpower;

                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败!');
                            }
                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $re_manpower)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }
                            break;
                        }else{
                            $bill_list['manpower'] = $last_info->remain;
                            $re_manpower = $manpower - $last_info->remain;
                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败,提交提交有误!');
                            }
                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $last_info->remain)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }
                        }
                    }
                } //end_for

            }elseif($submit_status === 2){ //顺延

                $re_manpower = $manpower;
                for($i=$first_week_count;$i<=$last_week_count;$i++){

                    if($i == $first_week_count){
                        if($first_info->remain == 0){
                            continue;
                        }
                        $bill_list['manpower'] = $first_info->remain;
                        $re_manpower = $manpower - $first_info->remain;
                        if(!DB::table("bill_slave")->insert($bill_list)){
                            throw new \Exception('bill_slave入库失败!');
                        }
                        if( !DB::table("humtableinit2")->where([
                            ['week_count', $i],
                            ['ttid','=',$ttype]
                        ])->update(['remain'=>0]) ){
                            throw new \Exception("humtableinit2数据更新失败");
                            return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                        }
                    }

                    if($i>$first_week_count && $i<$last_week_count ){
                        $info =  DB::table("humtableinit2")->where([
                            ['year','=',$s_year],
                            ['ttid','=',$ttype],
                            ['week_count', $i]
                        ])->first();

                        if($info->remain == 0){
                            continue;
                        }
                        $bill_list['manpower'] = $info->remain;
                        $re_manpower = $re_manpower - $info->remain;
                        if(!DB::table("bill_slave")->insert($bill_list)){
                            throw new \Exception('bill_slave入库失败!');
                        }
                        if(!DB::table("humtableinit2")->where([
                            ['week_count', $i],
                            ['ttid','=',$ttype]
                        ])->update(['remain'=>0])){
                            throw new \Exception("humtableinit2数据更新失败");
                            return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                        }
                    }

                    if($i == $last_week_count){
                        $bill_list['manpower'] = $re_manpower;
                        if(!DB::table("bill_slave")->insert($bill_list)){
                            throw new \Exception('bill_slave入库失败,提交提交有误!');
                        }
                        if(!DB::table("humtableinit2")->where([
                            ['week_count', $i],
                            ['ttid','=',$ttype]
                        ])->decrement('remain', $re_manpower)){
                            throw new \Exception("humtableinit2数据更新失败");
                            return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                        }
                    }

                } //end_for

            }elseif($submit_status === 3){ //加班
                //减去加班人力
                $re_manpower = $manpower - $arr['overManpower'];

                for($i=$first_week_count;$i<=$last_week_count;$i++){

                    if($i == $first_week_count){
                        if($first_info->remain == 0){
                            continue;
                        }
                        $bill_list['manpower'] = $first_info->remain;
                        $re_manpower = $re_manpower - $first_info->remain;
                        if(!DB::table("bill_slave")->insert($bill_list)){
                            throw new \Exception('bill_slave入库失败!');
                        }
                        if( !DB::table("humtableinit2")->where([
                            ['week_count', $i],
                            ['ttid','=',$ttype]
                        ])->update(['remain'=>0]) ){
                            throw new \Exception("humtableinit2数据更新失败");
                            return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                        }
                    }

                    if($i>$first_week_count && $i<$last_week_count ){
                        $info =  DB::table("humtableinit2")->where([
                            ['year','=',$s_year],
                            ['ttid','=',$ttype],
                            ['week_count', $i]
                        ])->first();

                        if($info->remain == 0){
                            continue;
                        }

                        if( $info->remain >= $re_manpower ){
                            $bill_list['manpower'] = $re_manpower;
                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败!');
                            }
                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $re_manpower)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }
                            break;
                        }else{
                            $bill_list['manpower'] = $info->remain;
                            $re_manpower = $re_manpower - $info->remain;
                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败!');
                            }
                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $info->remain)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }
                        }
                    }

                    if($i == $last_week_count){
                        if($last_info->remain == 0){
                            continue;
                        }
                        if($last_info->remain >= $re_manpower){
                            $bill_list['manpower'] = $re_manpower;

                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败!');
                            }
                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $re_manpower)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }
                            break;
                        }else{
                            $bill_list['manpower'] = $last_info->remain;
                            $re_manpower = $manpower - $last_info->remain;
                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败,提交提交有误!');
                            }
                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $last_info->remain)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }
                        }
                    }
                }


            }elseif($submit_status == 4){ //自定义
                $re_manpower = $manpower;
                for($i=$first_week_count;$i<=$last_week_count;$i++){

                    if($i == $first_week_count){
                        if($first_info->remain == 0){
                            continue;
                        }
                        if($first_info->remain >= $manpower){
                            $bill_list['manpower'] = $manpower;

                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败!');
                            }

                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $manpower)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }

                            break;
                        }else{
                            $bill_list['manpower'] = $first_info->remain;
                            $re_manpower = $manpower - $first_info->remain;
                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败!');
                            }
                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $first_info->remain)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }
                        }
                    }

                    if($i>$first_week_count && $i<$last_week_count ){
                        $info =  DB::table("humtableinit2")->where([
                            ['year','=',$s_year],
                            ['ttid','=',$ttype],
                            ['week_count', $i]
                        ])->first();

                        if($info->remain == 0){
                            continue;
                        }

                        if( $info->remain >= $re_manpower ){
                            $bill_list['manpower'] = $re_manpower;
                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败!');
                            }
                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $re_manpower)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }
                            break;
                        }else{
                            $bill_list['manpower'] = $info->remain;
                            $re_manpower = $re_manpower - $info->remain;
                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败!');
                            }
                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $info->remain)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }
                        }
                    }

                    if($i == $last_week_count){
                        if($last_info->remain == 0){
                            continue;
                        }
                        if($last_info->remain >= $re_manpower){
                            $bill_list['manpower'] = $re_manpower;

                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败!');
                            }
                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $re_manpower)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }
                            break;
                        }else{
                            $bill_list['manpower'] = $last_info->remain;
                            $re_manpower = $manpower - $last_info->remain;
                            if(!DB::table("bill_slave")->insert($bill_list)){
                                throw new \Exception('bill_slave入库失败,提交提交有误!');
                            }
                            if(!DB::table("humtableinit2")->where([
                                ['week_count', $i],
                                ['ttid','=',$ttype]
                            ])->decrement('remain', $last_info->remain)){
                                throw new \Exception("humtableinit2数据更新失败");
                                return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                            }
                        }
                    }
                } //end_for
            }





        //---------------邮件----------------------
        $userInfo = DB::table("users")->select('email','depart','is_chargeman')->where("id",'=',$bill['uid'])->first();
        $useremail = $userInfo->email;
        $cc_email ='';
        //当前用户不是组长就查询
        if($userInfo->is_chargeman != 1) {
            //组长邮件
            $cc_email = DB::table("users")->where([
                ["is_chargeman",'=',1],
                ['depart','=',$userInfo->depart]
            ])->value('email');
        }

        Mail::send('mail.billadd',compact('re'),function(Message $message) use($re,$useremail,$cc_email){
            //发给谁
            $message->to($useremail);
            //抄送
            if($cc_email){
                $message->cc($cc_email);
            }
            //主题
            $message->subject("提单创建成功!");
        });

        //---------邮件---------------

        return $this->jsonSuccessData(ApiErrDesc::SUCCESS[0],ApiErrDesc::SUCCESS[1]);


}


}
