---
extends: _layouts.post
section: content
title: Merge strings alternately
problemUrl: https://leetcode.com/problems/merge-strings-alternately/
date: 2022-11-14
categories: [array-and-hashmap]
---

We will use 2 pointers to iterate through the 2 strings and append the characters to the result.

```python
class Solution:
    def mergeAlternately(self, word1: str, word2: str) -> str:
        res = []
        i = j = 0
        while i < len(word1) and j < len(word2):
            res.append(word1[i])
            res.append(word2[j])
            i += 1
            j += 1
        while i < len(word1):
            res.append(word1[i])
            i += 1
        while j < len(word2):
            res.append(word2[j])
            j += 1
        return ''.join(res)
```

Time complexity: `O(n+m)` <br>
Space complexity: `O(n+m)`

We can use python's zip function to simplify the code:

```python
class Solution:
    def mergeAlternately(self, word1: str, word2: str) -> str:
        return ''.join(a + b for a, b in zip(word1, word2)) + word1[len(word2):] + word2[len(word1):]
```

Or we can use zip_longest to avoid the last 2 lines:

```python
class Solution:
    def mergeAlternately(self, word1: str, word2: str) -> str:
        return ''.join(a + b for a, b in itertools.zip_longest(word1, word2, fillvalue=''))
```