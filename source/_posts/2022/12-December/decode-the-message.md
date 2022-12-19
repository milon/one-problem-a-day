---
extends: _layouts.post
section: content
title: Decode the message
problemUrl: https://leetcode.com/problems/decode-the-message/
date: 2022-12-19
categories: [array-and-hashmap]
---

We will use a hashmap to map the characters to their corresponding letters. Then iterate over the message, replace the characters with their corresponding letters and return the result.

```python
class Solution:
    def decodeMessage(self, key: str, message: str) -> str:
        mapping = {' ': ' '}
        letters = 'abcdefghijklmnopqrstuvwxyz'
        
        i = 0
        for char in key:
            if char not in mapping:
                mapping[char] = letters[i]
                i += 1
        
        res = ''
        for char in message:
            res += mapping[char]
                
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
