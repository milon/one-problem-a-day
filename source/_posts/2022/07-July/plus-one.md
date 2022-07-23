---
extends: _layouts.post
section: content
title: Plus one
problemUrl: https://leetcode.com/problems/plus-one/
date: 2022-07-23
categories: [math-and-geometry]
---

First we reverse the list, then add one to the fist item, if the number is 9, then we keep a carry and add it to the next number. We will do that until all the digit in the list have been iterated through. Then we return the reversed list.

```python
class Solution:
    def plusOne(self, digits: List[int]) -> List[int]:
        one = 1
        i = 0
        digits = digits[::-1]

        while one:
            if i < len(digits):
                if digits[i] == 9:
                    digits[i] = 0
                else:
                    digits[i] += 1
                    one = 0
            else:
                digits.append(one)
                one = 0
            i += 1

        return digits[::-1]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`