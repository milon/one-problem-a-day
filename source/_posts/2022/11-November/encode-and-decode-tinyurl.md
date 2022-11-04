---
extends: _layouts.post
section: content
title: Encode and decode tinyurl
problemUrl: https://leetcode.com/problems/encode-and-decode-tinyurl/
date: 2022-11-04
categories: [design]
---

We will use two hashmaps, one for storing the code and another for storing the url. The we will create a helper function to get a random string of length 6. We will use this function to generate the code for the url. We will store the code and url in the hashmaps. The encode function will return the code and the decode function will return the url.

```python
class Codec:
    def __init__(self):
        self.codeDB, self.urlDB = defaultdict(), defaultdict()
        self.chars = string.ascii_letters + string.digits
    
    def getCode(self) -> str:
        code = ''.join(random.choice(self.chars) for i in range(6))
        return "http://tinyurl.com/" + code

    def encode(self, longUrl: str) -> str:
        if longUrl in self.urlDB: return self.urlDB[longUrl]
        code = self.getCode()
        while code in self.codeDB: code = getCode()
        self.codeDB[code] = longUrl
        self.urlDB[longUrl] = code
        return code

    def decode(self, shortUrl: str) -> str:
        return self.codeDB[shortUrl]
        
# Your Codec object will be instantiated and called as such:
# codec = Codec()
# codec.decode(codec.encode(url))
```

Time complexity: `O(1)` for both encode and decode functions. <br/>
Space complexity: `O(n)` where n is the number of urls encoded.