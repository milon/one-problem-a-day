---
extends: _layouts.post
section: content
title: Valid number
problemUrl: https://leetcode.com/problems/valid-number/
date: 2022-10-30
categories: [array-and-hashmap]
---

We cal also use 3 flags for met_dot, met_e and met_digit. We can iterate over the string and update the flags. If the current character is a digit, we can set met_digit to true. If the current character is a dot, we can set met_dot to true. If the current character is an e, we can set met_e to true. If the current character is a sign, we can check if the previous character is an e or not. If the current character is not a digit, a dot, an e or a sign, we can return false. If the current character is a dot, we can check if met_dot or met_e is true. If the current character is an e, we can check if met_e or met_digit is false. If the current character is a sign, we can check if i is not 0. If the string is empty, we can return false. If met_e is true, we can return met_digit. If met_e is false, we can return met_digit and met_dot.

```python
class Solution:
    def isNumber(self, s: str) -> bool:
        met_dot = met_e = met_digit = False
        for i, char in enumerate(s):
            if char.isdigit():
                met_digit = True
            elif char == '.':
                if met_dot or met_e:
                    return False
                met_dot = True
            elif char.lower() == 'e':
                if met_e or not met_digit:
                    return False
                met_e = True
                met_digit = False
            elif char in '+-':
                if i != 0 and s[i-1] != 'e':
                    return False
            else:
                return False
        return met_digit
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`