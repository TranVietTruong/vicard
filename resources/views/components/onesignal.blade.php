{{--<style>--}}
{{--    #onesignal-bell-container.onesignal-reset .onesignal-bell-launcher.onesignal-bell-launcher-sm .onesignal-bell-launcher-button {--}}
{{--        width: 48px !important;--}}
{{--        height: 48px !important;--}}
{{--    }--}}
{{--    #onesignal-bell-container.onesignal-reset .onesignal-bell-launcher-inactive {--}}
{{--        opacity: 1 !important;--}}
{{--    }--}}
{{--</style>--}}
{{--<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>--}}
{{--<script>--}}
{{--  async function postData(url = '', data = {}) {--}}
{{--    // Default options are marked with *--}}
{{--    const response = await fetch(url, {--}}
{{--      method: 'POST', // *GET, POST, PUT, DELETE, etc.--}}
{{--      mode: 'cors', // no-cors, *cors, same-origin--}}
{{--      cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached--}}
{{--      credentials: 'same-origin', // include, *same-origin, omit--}}
{{--      headers: {--}}
{{--        'Content-Type': 'application/json'--}}
{{--        // 'Content-Type': 'application/x-www-form-urlencoded',--}}
{{--      },--}}
{{--      redirect: 'follow', // manual, *follow, error--}}
{{--      referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url--}}
{{--      body: JSON.stringify(data) // body data type must match "Content-Type" header--}}
{{--    });--}}
{{--    return response.json(); // parses JSON response into native JavaScript objects--}}
{{--  }--}}



{{--  window.OneSignal = window.OneSignal || [];--}}
{{--  window.id = '{{$userId}}';--}}
{{--  OneSignal.push(function() {--}}
{{--    OneSignal.init({--}}
{{--      appId: "5978853b-0a67-4640-bea2-1e4a90020e61",--}}
{{--      safari_web_id: "web.onesignal.auto.1afe2633-50cf-455e-8f3e-a50d8cbe1d12",--}}
{{--      autoRegister:true,--}}
{{--      autoResubscribe: true,--}}
{{--      subdomainName: "truong",--}}
{{--      notifyButton: {--}}
{{--        enable: true,--}}
{{--        text: {--}}
{{--          'tip.state.unsubscribed': '????ng k?? nh???n th??ng b??o',--}}
{{--          'tip.state.subscribed': 'B???n ???? ????ng k?? nh???n th??ng b??o',--}}
{{--          'tip.state.blocked': "B???n ???? block trang n??y",--}}
{{--          'message.prenotify': 'B???m ????? ????ng k?? nh???n th??ng b??o',--}}
{{--          'message.action.subscribed': "????ng k?? th??nh c??ng !",--}}
{{--          'message.action.resubscribed': "B???n ???? ????ng k?? nh???n th??ng b??o",--}}
{{--          'message.action.unsubscribed': "B???n s??? kh??ng nh???n ???????c th??ng b??o n???a",--}}
{{--          'dialog.main.title': '????ng K?? Th??ng B??o',--}}
{{--          'dialog.main.button.subscribe': '????ng K??',--}}
{{--          'dialog.main.button.unsubscribe': 'H???y ????ng K??',--}}
{{--          'dialog.blocked.title': 'M??? Kh??a',--}}
{{--          'dialog.blocked.message': "L??m theo c??c h?????ng d???n sau ????? nh???n th??ng b??o"--}}
{{--        },--}}
{{--        offset: {--}}
{{--          bottom: '100px'--}}
{{--        },--}}
{{--        size: 'medium'--}}
{{--      },--}}
{{--      welcomeNotification: {--}}
{{--        title: '@if(isset($name)){{$name->info}}@else Th??ng b??o @endif',--}}
{{--        message: 'C???m ??n b???n ???? ????ng k?? !'--}}
{{--      }--}}
{{--    });--}}

{{--  });--}}

{{--  OneSignal.push(function() {--}}
{{--    OneSignal.on('subscriptionChange', function (isSubscribed) {--}}
{{--      if (isSubscribed) {--}}
{{--        OneSignal.getUserId( function(userId) {--}}
{{--          postData('http://nfctag.com:8888/api/v1.0/subscriber', {user_id:id,subscriber:userId}).then(data => {--}}
{{--            console.log(data);--}}
{{--          });--}}
{{--        });--}}
{{--      }--}}
{{--    });--}}

{{--    OneSignal.isPushNotificationsEnabled(function(isEnabled) {--}}
{{--      if (isEnabled)--}}
{{--        OneSignal.getUserId( function(userId) {--}}
{{--          postData('http://nfctag.com:8888/api/v1.0/subscriber', {user_id:id,subscriber:userId}).then(data => {--}}
{{--            console.log(data);--}}
{{--          });--}}
{{--        });--}}
{{--      else--}}
{{--        console.log("Push notifications are not enabled yet.");--}}
{{--    });--}}
{{--  });--}}
{{--</script>--}}
