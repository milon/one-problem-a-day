---
extends: _layouts.post
section: content
title: Reverse words in a string III
problemUrl: https://leetcode.com/problems/reverse-words-in-a-string-iii/
date: 2022-09-22
categories: [array-and-hashmap]
---

We will split the words, then reverse each word indivisually, then merge them together and return as result.

```python
class Solution:
    def reverseWords(self, s: str) -> str:
        return ' '.join(word[::-1] for word in s.split())
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`