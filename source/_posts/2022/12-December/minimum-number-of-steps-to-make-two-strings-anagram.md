---
extends: _layouts.post
section: content
title: Minimum number of steps to make two strings anagram
problemUrl: https://leetcode.com/problems/minimum-number-of-steps-to-make-two-strings-anagram/
date: 2022-12-04
categories: [array-and-hashmap]
---

We will count the character frequency of both the strings. We will iterate over the character frequency of the first string and for each character we will find the number of characters that we need to remove from the second string to make the character frequency of the first string equal to the character frequency of the second string. We will keep track of the minimum number of characters that we need to remove from the second string and return it at the end.

```python
class Solution:
    def minSteps(self, s: str, t: str) -> int:
        freqS, freqT = Counter(s), Counter(t)
        diff = freqT - freqS
        return sum(diff.values())
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`