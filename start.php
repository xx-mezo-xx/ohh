<?php
date_default_timezone_set('Asia/Baghdad');
$config = json_decode(file_get_contents('config.json'),1);
$id = $config['id'];
$token = $config['token'];
$config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
$screen = file_get_contents('screen');
exec('kill -9 ' . file_get_contents($screen . 'pid'));
file_put_contents($screen . 'pid', getmypid());
include 'index.php';
$accounts = json_decode(file_get_contents('accounts.json') , 1);
$cookies = $accounts[$screen]['cookies'];
$useragent = $accounts[$screen]['useragent'];
$users = explode("\n", file_get_contents($screen));
$uu = explode(':', $screen) [0];
$se = 0;
$i = 0;
$gmail = 0;
$hotmail = 0;
$yahoo = 0;
$mailru = 0;
$hunter = 0;
$true = 0;
$false = 0;
$edit = bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"تم بدء الفحص روح نام😹 🌝 : 

" . date('Y/n/j') . "\n" . "
",
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'𝐂𝐇𝐄𝐂𝐊 ~ '.$i,'callback_data'=>'fgf']],
                [['text'=>'𝐄𝐌𝐀𝐈𝐋 ~ '.$mail,'callback_data'=>'bro']],
                [['text'=>'𝗨𝗦𝗘𝗥 ~ '.$user,'callback_data'=>'fgdfg']],
                [['text'=>"𝐆𝐌𝐀𝐈𝐋 : $gmail",'callback_data'=>'dfgfd'],['text'=>"𝐘𝐀𝐇𝐎𝐎 : $yahoo",'callback_data'=>'gdfgfd']],
                [['text'=>'𝐌𝐀𝐈𝐋𝐑𝐔 : '.$mailru,'callback_data'=>'fgd'],['text'=>'𝐇𝐎𝐓𝐌𝐀𝐈 : '.$hotmail,'callback_data'=>'ghj']],
                [['text'=>"𝐀𝐎𝐋 : $hunter",'callback_data'=>'fgjjjvf']],
                [['text'=>' ✅ 𝗧𝗥𝗨𝗘 ~ '.$true,'callback_data'=>'gj']],
                [['text'=>' ❌ 𝐅𝐀𝐋𝐒𝐄 ~ '.$false,'callback_data'=>'dghkf']]
            ]
        ])
]);
$se = 100;
$editAfter = 1;
foreach ($users as $user) {
    $info = getInfo($user, $cookies, $useragent);
    if ($info != false and !is_string($info)) {
        $mail = trim($info['mail']);
        $usern = $info['user'];
        $e = explode('@', $mail);
               if (preg_match('/(live|hotmail|outlook|yahoo|Yahoo|yAhoo)\.(.*)|(gmail)\.(com)|(mail|bk|yandex|inbox|list)\.(ru)/i', $mail,$m)) {
            echo 'check ' . $mail . PHP_EOL;
                    if(checkMail($mail)){
                        $inInsta = inInsta($mail);
                        if ($inInsta !== false) {
                            // if($config['filter'] <= $follow){
                                echo "True - $user - " . $mail . "\n";
                                if(strpos($mail, 'gmail.com')){
                               
                                    $gmail += 1;
                                } elseif(strpos($mail, 'aol')){ 
                               	$hunter = 1;
                                } elseif(strpos($mail, 'hotmail.') or strpos($mail,'outlook.') or strpos($mail,'live.com')){
                                    $hotmail += 1;
                                } elseif(strpos($mail, 'yahoo')){
                                    $yahoo += 1;
                                } elseif(preg_match('/(mail|bk|yandex|inbox|list)\.(ru)/i', $mail)){
                                    $mailru += 1;
                                }
                                $follow = $info['f'];
                                $following = $info['ff'];
                                $media = $info['m'];
                                bot('sendMessage', ['disable_web_page_preview' => true, 'chat_id' => $id, 'text' => "𝙷𝙸 𝚂𝙸𝚁 𝙷𝚄𝙽𝚃𝙴𝚁💉🖤
━━━━━━━━━━━━
.☆ . 𝚄𝚂𝙴𝚁 : `$usern`\n 
.𖢸 . 𝙴𝙼𝙰𝙸𝙻 : `$mail`\n 
.☆ . 𝙵𝙾𝙻𝙻𝙾𝚆𝙴𝚁𝚂 : $follow\n 
.𖢸 . 𝙵𝙾𝙻𝙻𝙾𝚆𝙸𝙽𝙶 : $following\n 
.☆. 𝙿𝙾𝚂𝚃 : $media\n
.𖢸 . 𝚃𝙸𝙼𝙴 : ".date("Y")."/".date("n")."/".date("d")." : " . date('g:i') . "\n" . " 
━━━━━━━━━━━━
↯Tele↯.                     ↯CH↯\n
:-  @Y_OMO              :-  @TTTPTTTTT",
                                
                                'parse_mode'=>'markdown']);
                                
                                bot('editMessageReplyMarkup',[
                                    'chat_id'=>$id,
                                    'message_id'=>$edit->result->message_id,
                                    'reply_markup'=>json_encode([
                                        'inline_keyboard'=>[
                              [['text'=>' 𝐂𝐇𝐄𝐂𝐊 ~ '.$i,'callback_data'=>'fgf']],
                              [['text'=>'𝐄𝐌𝐀𝐈𝐋 ~ '.$mail,'callback_data'=>'bro']],
                              [['text'=>'𝗨𝗦𝗘𝗥 ~ '.$user,'callback_data'=>'fgdfg']],
                              [['text'=>"𝐆𝐌𝐀𝐈𝐋 : $gmail",'callback_data'=>'dfgfd'],['text'=>"𝐘𝐀𝐇𝐎𝐎 : $yahoo",'callback_data'=>'gdfgfd']],
                              [['text'=>'𝐌𝐀𝐈𝐋𝐑𝐔 : '.$mailru,'callback_data'=>'fgd'],['text'=>'𝐇𝐎𝐓𝐌𝐀𝐈 : '.$hotmail,'callback_data'=>'ghj']],
                              [['text'=>"𝐀𝐎𝐋 : $hunter",'callback_data'=>'fgjjjvf']],
                              [['text'=>' ✅ 𝗧𝗥𝗨𝗘 ~ '.$true,'callback_data'=>'gj']],
                              [['text'=>' ❌ 𝐅𝐀𝐋𝐒𝐄 ~ '.$false,'callback_data'=>'dghkf']]
                                        ]
                                    ])
                                ]);
                                $true += 1;
                            // } else {
                            //     echo "Filter , ".$mail.PHP_EOL;
                            // }
                            
                        } else {
                          echo "No Rest $mail\n";
                        }
                    } else {
                        $false +=1;
                        echo "Not Vaild 2 - $mail\n";
                    }
        } else {
          echo "BlackList - $mail\n";
        }
    } elseif(is_string($info)){
        bot('sendMessage',[
            'chat_id'=>$id,
            'text'=>"الحساب - `$screen`\n تم حظره من *الفحص*.",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                        [['text'=>'نقل اللسته -✅','callback_data'=>'moveList&'.$screen]],
                        [['text'=>'حذف الحساب -❎','callback_data'=>'del&'.$screen]]
                    ]    
            ]),
            'parse_mode'=>'markdown'
        ]);
        exit;
    } else {
        $NotBusiness+=1;
        echo "Not Bussines - $user\n";
    }
    usleep(750000);
    $i++;
    file_put_contents($screen, str_replace($user, '', file_get_contents($screen)));
    file_put_contents($screen, preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "", file_get_contents($screen)));
    if($i == $editAfter){
        bot('editMessageReplyMarkup',[
            'chat_id'=>$id,
            'message_id'=>$edit->result->message_id,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [['text'=>' 𝐂𝐇𝐄𝐂𝐊 ~ '.$i,'callback_data'=>'fgf']],
                    [['text'=>'𝐄𝐌𝐀𝐈𝐋 ~ '.$mail,'callback_data'=>'bro']],
                [['text'=>'𝗨𝗦𝗘𝗥 ~ '.$user,'callback_data'=>'fgdfg']],
                [['text'=>"𝐆𝐌𝐀𝐈𝐋 : $gmail",'callback_data'=>'dfgfd'],['text'=>"𝐘𝐀𝐇𝐎𝐎 : $yahoo",'callback_data'=>'gdfgfd']],
                [['text'=>'𝐌𝐀𝐈𝐋𝐑𝐔 : '.$mailru,'callback_data'=>'fgd'],['text'=>'𝐇𝐎𝐓𝐌𝐀𝐈 : '.$hotmail,'callback_data'=>'ghj']],
                [['text'=>"𝐀𝐎𝐋 : $hunter",'callback_data'=>'fgjjjvf']],
                [['text'=>' ✅ 𝗧𝗥𝗨𝗘 ~ '.$true,'callback_data'=>'gj']],
                [['text'=>' ❌ 𝐅𝐀𝐋𝐒𝐄 ~ '.$false,'callback_data'=>'dghkf']]
                ]
            ])
        ]);
        $editAfter += 1;
    }
}
bot('sendMessage', ['chat_id' => $id, 'text' =>"انتهى الفحص : ".explode(':',$screen)[0]]);

