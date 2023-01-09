---
extends: _layouts.post
section: content
title: Find and replace in string
problemUrl: https://leetcode.com/problems/find-and-replace-in-string/
date: 2023-01-09
categories: [array-and-hashmap]
---

We will initialize the string as a character array. Then create a replacement map using the provided source, indices and target. Then we iterate over this map, and replace the characters. Finally join together the replaced characters to create the string and return it as a result.

```python
class Solution:
    def findReplaceString(self, s: str, indices: List[int], sources: List[str], targets: List[str]) -> str:
        replacement = zip(sources, indices, targets)
        res = list(s)
        
        for source, idx, target in replacement:
            if s[idx: idx + len(source)] == source:
                res[idx] = target
                for i in range(idx + 1, idx + len(source)):
                    res[i] = ''
        
        return ''.join(res)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`