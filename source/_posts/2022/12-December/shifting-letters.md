---
extends: _layouts.post
section: content
title: Shifting letters
problemUrl: https://leetcode.com/problems/shifting-letters/
date: 2022-12-20
categories: [array-and-hashmap]
---

We will calculate the total shift and then shift each character by the total shift. We will keep track of the total shift by subtracting the shift from the total shift. We will use a helper function to shift the character by the shift.

```python
class Solution:
    def shiftingLetters(self, s: str, shifts: List[int]) -> str:
        totalShift = sum(shifts)
        res = []
        for i, ch in enumerate(s):
            res.append(self.shift(ch, totalShift))
            totalShift -= shifts[i]
        return ''.join(res)
    
    def shift(self, ch: str, shift: int) -> str:
        return chr((ord(ch) - ord('a') + shift) % 26 + ord('a'))
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`