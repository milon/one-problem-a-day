---
extends: _layouts.post
section: content
title: Split strings by separator
problemUrl: https://leetcode.com/problems/split-strings-by-separator/
date: 2023-06-24
categories: [array-and-hashmap]
---

We will iterate over the words and split them by the separator. We will then append the non-empty words to the result list.

```python
class Solution:
    def splitWordsBySeparator(self, words: List[str], separator: str) -> List[str]:
        res = []
        for word in words:
            splits = word.split(separator)
            res.extend(filter(lambda x: x, splits))
        return res
```

Time Complexity: `O(n)` where `n` is the number of words. <br/>
Space Complexity: `O(n)` where `n` is the number of words.