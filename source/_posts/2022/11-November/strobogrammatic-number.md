---
extends: _layouts.post
section: content
title: Strobogrammatic number
problemUrl: https://leetcode.com/problems/strobogrammatic-number/
date: 2022-11-26
categories: [array-and-hashmap]
---

We will use a lookup table to store the pairs. We will iterate over the string. If the character is not in the lookup table, we will return false. If the character is in the lookup table, we will check if the character at the other end of the string is the same as the value in the lookup table. If it is not, we will return false. We will return true if we iterate over the string.

```python
class Solution:
    def isStrobogrammatic(self, num: str) -> bool:
        lookup = {'0': '0', '1': '1', '6': '9', '8': '8', '9': '6'}
        for i in range(len(num)):
            if num[i] not in lookup:
                return False
            if num[-i - 1] != lookup[num[i]]:
                return False
        return True
```

Time complexity: `O(n)`, n is the length of the string <br/>
Space complexity: `O(1)`