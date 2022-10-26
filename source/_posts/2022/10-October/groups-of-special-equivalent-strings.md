---
extends: _layouts.post
section: content
title: Groups of special equivalent strings
problemUrl: https://leetcode.com/problems/groups-of-special-equivalent-strings/
date: 2022-10-26
categories: [array-and-hashmap]
---

We will take each word, separate the even and odd characters, and sort them. Then we add them to a set. The size of the set is the number of groups.

```python
class Solution:
    def numSpecialEquivGroups(self, words: List[str]) -> int:
        res = set()
        for w in words:
            sorted_odd_even = ''.join(sorted(w[1::2]) + sorted(w[::2]))
            res.add(sorted_odd_even)
        return len(res)
```

Time Complexity: `O(n*klog(k))`, n is the number of words, k is the lenght of longest word <br/>
Space Complexity: `O(n*k)`