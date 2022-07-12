---
extends: _layouts.post
section: content
title: Group anagrams
date: 2022-07-12
categories: [array-and-hashmap]
---

Problem URL: [Group anagrams](https://leetcode.com/problems/group-anagrams/)

We are given a list of strings. We can iterate through each string, and sort it charactes, then use this as key in a hashmap, and the value of the hashmap will be a list. We will append the original string to the list. That what, each anagram will have the same key as they are sorted, so all of them will group together. Then we return the values of the hashmap.

```python
class Solution:
    def groupAnagrams(self, strs: List[str]) -> List[List[str]]:
        res = collections.defaultdict(list)
        for s in strs:
            res[str(sorted(s))].append(s)
        return res.values()
```

For sorting each string will be `O(nlog(n))`, and we perform it 1 time for each string, so `O(n)`. Our space complexity will be `O(n)`.