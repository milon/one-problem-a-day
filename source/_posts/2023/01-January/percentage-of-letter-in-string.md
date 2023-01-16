---
extends: _layouts.post
section: content
title: Percentage of letter in string
problemUrl: https://leetcode.com/problems/percentage-of-letter-in-string/
date: 2023-01-16
categories: [array-and-hashmap]
---

We will count the number of occurance of the letter in the string, and then calculate the percentage of the given letter.

```python
class Solution:
    def percentageLetter(self, s: str, letter: str) -> int:
        return int((s.count(letter) / len(s)) * 100)
```

Time complexity: `O(n)`, n is the length of the string. <br/>
Space complexity: `O(1)`