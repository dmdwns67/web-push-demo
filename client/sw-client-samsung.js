var CACHE_NAME = 'client-cache';
var urlsToCache = [
    '/',
];

self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(	//프라미스를 사용하여 설치 소요 시간 및 설치 성공 여부를 확인
    caches.open(CACHE_NAME).then(function(cache) {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('notificationclose', function(e) {
    var notification = e.notification;
    var primaryKey = notification.data.primaryKey;

    console.log('Closed notification: ' + primaryKey);
  });

  self.addEventListener('notificationclick', function(e) {
    var notification = e.notification;
    var primaryKey = notification.data.primaryKey;
    var action = e.action;

    if (action === 'close') {
      notification.close();
    } else {
      clients.openWindow('/client/html/' + primaryKey + '.html');
      notification.close();
    }
  });

self.addEventListener('push', function(e) {
var options = {
    body: '카운터에서 음료를 받아가세요! :)',
    icon: 'images/pushicon-coffee.jpg',
    sound: 'audio/old_spice_whistle.mp3',
    vibrate: [300,100,300], //테스트용
    //vibrate: [500, 700, 500, 700, 500, 700, 500, 700, 500],
    data: {
      dateOfArrival: Date.now(),
      primaryKey: 'confirmNotification'
    },
    actions: [
      {action: 'explore', title: '알림 확인',
        icon: 'images/checkmark.png'},
      {action: 'close', title: '알림 끄기',
        icon: 'images/xmark.png'},
    ]
  };
  e.waitUntil(
    self.registration.showNotification('음료 제조완료', options)
  );
});
