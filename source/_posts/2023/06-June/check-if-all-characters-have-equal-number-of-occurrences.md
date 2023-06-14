---
extends: _layouts.post
section: content
title: Check if all characters have equal number of occurrences
problemUrl: https://leetcode.com/problems/check-if-all-characters-have-equal-number-of-occurrences/
date: 2023-06-13
categories: [array-and-hashmap]
---

We will count all the occurance of the characters in the string and store it in a hashmap. Then we will check if all the values in the hashmap are equal or not.

```python
class Solution:
    def areOccurrencesEqual(self, s: str) -> bool:
        count = collections.Counter(s).values()
        return len(set(count)) == 1
```

Time Complexity: `O(n)` where `n` is the length of the string. <br/>
Space Complexity: `O(n)` where `n` is the length of the string.