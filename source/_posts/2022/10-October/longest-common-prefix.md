---
extends: _layouts.post
section: content
title: Longest common prefix
problemUrl: https://leetcode.com/problems/longest-common-prefix/
date: 2022-10-06
categories: [array-and-hashmap]
---

We will take the shortest string as the shortest at the beginning. Then we iterate over each character of the shortest string, and match with the other strings, if the character doesn't match, we return the slice of the shortest string till that character. If we reach the end of the shortest string, we return that as result.

```python
class Solution:
    def longestCommonPrefix(self, strs: List[str]) -> str:
        if not strs:
            return ''
        
        shortest = min(strs, key=len)
        for i, ch in enumerate(shortest):
            for others in strs:
                if others[i] != ch:
                    return shortest[:i]
                
        return shortest
```

Time Complexity: `O(n^m)`, n is the lenght of the shortest string, m is the number of strings <br/>
Space Complexity: `O(1)`