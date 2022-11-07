---
extends: _layouts.post
section: content
title: Maximum 69 number
problemUrl: https://leetcode.com/problems/maximum-69-number/
date: 2022-11-07
categories: [array-and-hashmap]
---

We will iterate over all the digits of the number and check if the digit is 6. If it is, we will replace it with 9 and return the number.

```python
class Solution:
    def maximum69Number (self, num: int) -> int:
        num = list(str(num))
        for i in range(len(num)):
            if num[i] == '6':
                num[i] = '9'
                break
        return int(''.join(num))
```

Time complexity: `O(n)`
Space complexity: `O(n)`

Here is a one-liner solution:

```python
class Solution:
    def maximum69Number (self, num: int) -> int:
        return int(str(num).replace('6', '9', 1))
```
