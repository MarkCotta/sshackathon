self.addEventListener('install', function(event) {
    event.waitUntil(
      caches.open('my-cache').then(function(cache) {
        return cache.addAll([
          '/',
          'register.html',
          'css/reg.css',
          'bootstrap2/css/bootstrap.min.css',
          'bootstrap2/js/jquery-3.5.1.min.js',
          'bootstrap2/js/bootstrap.min.js',

          
        ]);
      })
    );
  });
  
  self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.match(event.request).then(function(response) {
        return response || fetch(event.request);
      })
    );
  });