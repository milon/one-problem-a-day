---
extends: _layouts.post
section: content
title: Longest substring of all vowels in order
problemUrl: https://leetcode.com/problems/longest-substring-of-all-vowels-in-order/
date: 2022-11-15
categories: [sliding-window]
---

We can use a sliding window and a hash set to find the longest substring of all vowels in order.

```python
class Solution:
    def longestBeautifulSubstring(self, word: str) -> int:
        if len(word) < 5:
            return 0
        
        l, r = 0, 0
        res = 0
        seen = set()
        while r < len(word):
            if word[r-1] > word[r]:
                l = r
                seen = set()
            
            seen.add(word[r])
            
            if len(seen) > 4:
                res = max(res, r-l+1)
                
            r += 1
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`