---
extends: _layouts.post
section: content
title: Single row keyboard
problemUrl: https://leetcode.com/problems/single-row-keyboard/
date: 2022-12-01
categories: [array-and-hashmap]
---

We will iterate over the word, find the index of the character in the keyboard and add the difference between the current and previous index to the result.

```python
class Solution:
    def calculateTime(self, keyboard: str, word: str) -> int:
        index = {ch: i for i, ch in enumerate(keyboard)}
        res = 0
        prev = 0
        for ch in word:
            res += abs(index[ch] - prev)
            prev = index[ch]
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`