---
extends: _layouts.post
section: content
title: Reverse string II
problemUrl: https://leetcode.com/problems/reverse-string-ii/
date: 2022-09-27
categories: [two-pointers]
---

We will divide the string to a list if characters. Then we take k characters and reverse it. Then we skip another k characters and take the next k characters. So, we are looping over the list with 2*k jump in each iteration. Then when the iteration is done, we join the characters and return it as a result string.

```python
class Solution:
    def reverseStr(self, s: str, k: int) -> str:
        s = list(s)
        for i in range(0, len(s), k*2):
            s[i:i+k] = reversed(s[i:i+k])
        return ''.join(s)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`