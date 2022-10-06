---
extends: _layouts.post
section: content
title: Length of last word
problemUrl: https://leetcode.com/problems/length-of-last-word/
date: 2022-10-06
categories: [two-pointers]
---

We will first start from the end and move the end pointer till we find a character. Then we take another pointer beginning from the end character and move towards the beginning of the string until we find an empty character. Then return the difference between the beginning and end pointer as result.

```python
class Solution:
    def lengthOfLastWord(self, s: str) -> int:
        end = len(s)-1
        while s[end] == ' ' and end >= 0:
            end -= 1
        
        beg = end
        while s[beg] != ' ' and beg >= 0:
            beg -= 1
        
        return end - beg
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`