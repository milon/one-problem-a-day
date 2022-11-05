---
extends: _layouts.post
section: content
title: Counting words with a given prefix
problemUrl: https://leetcode.com/problems/counting-words-with-a-given-prefix/
date: 2022-11-05
categories: [array-and-hashmap]
---

We will iterate over the words and count the number of words that start with the given prefix.

```python
class Solution:
    def prefixCount(self, words: List[str], pref: str) -> int:
        res = 0
        for word in words:
            res += 1 if word.startswith(pref) else 0
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`