# Preinterview Assignment
Used Laravel (PHP) framework and [Guzzle PHP HTTP client](https://github.com/guzzle/guzzle)

[Deployed here](http://parsehub-preinterview.seyongcho.com/)

* * *
## Files to look at

The files I've changed: 
1. `routes/web.php` to define route
2. `app/Http/Middleware/VerifyCsrfToken` to add `proxy*` to exceptions for csrf checking
3. `app/Http/Controllers/ProxyController` for the get and post logic

* * *

## Example Usage

### Get
```
curl http://parsehub-preinterview.seyongcho.com/proxy/http://httpbin.org/get

returns 
{
  "args": {},
  "headers": {
    "Accept": "*/*",
    "Accept-Encoding": "gzip, deflate",
    "Connection": "close",
    "Host": "httpbin.org",
    "User-Agent": "curl/7.54.0"
  },
  "origin": "35.170.63.46",
  "url": "http://httpbin.org/get"
}
```

### Post
```
curl -X POST -d asdf=blah  http://parsehub-preinterview.seyongcho.com/proxy/http://httpbin.org/post

{
  "args": {},
  "data": "",
  "files": {},
  "form": {
    "asdf": "blah"
  },
  "headers": {
    "Accept": "*/*",
    "Accept-Encoding": "gzip, deflate",
    "Connection": "close",
    "Content-Length": "9",
    "Content-Type": "application/x-www-form-urlencoded",
    "Host": "httpbin.org",
    "User-Agent": "curl/7.54.0"
  },
  "json": null,
  "origin": "35.170.63.46",
  "url": "http://httpbin.org/post"
}
```

