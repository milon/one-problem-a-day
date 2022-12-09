---
extends: _layouts.post
section: content
title: Longest substring with at least k repeating characters
problemUrl: https://leetcode.com/problems/longest-substring-with-at-least-k-repeating-characters/
date: 2022-12-09
categories: [array-and-hashmap]
---

The idea is that any characters in the string that do not satisfy the requirement break the string in multiple parts that do not contain these characters, and for each part we should check the requirement again. There are similar solutions (not many), though most use string methods like split or count, which keep some important details hidden. Here I am also using Counter for short code but it's just replacing a usual dictionary and a single obvious loop to calculate counts of letters.

Concerning complexity, it is indeed formally O(n), like it was mentioned in another solution despite recursion, because at each level of recursion we look at maximum 2N characters, and there can be not more than 26 levels of recursion, because we remove at least one character from 26 possible characters each time we move to the next level.
    
```python
class Solution:
    def longestSubstring(self, s: str, k: int) -> int:
        def helper(s: str, k: int) -> int:
            if len(s) < k:
                return 0
            c = Counter(s)
            for ch in c:
                if c[ch] < k:
                    return max(helper(sub, k) for sub in s.split(ch))
            return len(s)
        return helper(s, k)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`