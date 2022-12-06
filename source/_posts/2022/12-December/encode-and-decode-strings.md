---
extends: _layouts.post
section: content
title: Encode and decode strings
problemUrl: https://leetcode.com/problems/encode-and-decode-strings/
date: 2022-12-06
categories: [design]
---

We will use a delimiter to separate the strings. Then we will loop over the strings and add the length of the string and the delimiter to the result. Finally, we will add the string to the result.

```python
class Codec:
    def encode(self, strs: List[str]) -> str:
        res = []
        for s in strs:
            res.append(str(len(s)))
            res.append(':')
            res.append(s)
        return ''.join(res)

    def decode(self, s: str) -> List[str]:
        res = []
        i = 0
        while i < len(s):
            j = s.find(':', i)
            length = int(s[i:j])
            res.append(s[j+1:j+1+length])
            i = j+1+length
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`

We can also do it in a more efficient way by using a delimiter that is not in the strings. Then we will loop over the strings and add the length of the string and the delimiter to the result. Finally, we will add the string to the result.

```python
class Codec:
    def encode(self, strs: List[str]) -> str:
        return "".join([x.replace("#","##") + " # " for x in strs])
        
    def decode(self, s: str) -> List[str]:
        return [x.replace("##","#") for x in s.split(" # ")[:-1]]
        
# Your Codec object will be instantiated and called as such:
# codec = Codec()
# codec.decode(codec.encode(strs))
```
