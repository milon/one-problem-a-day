---
extends: _layouts.post
section: content
title: Longest substring with at most k distinct characters
problemUrl: https://leetcode.com/problems/longest-substring-with-at-most-k-distinct-characters/
date: 2022-12-03
categories: [sliding-window]
---

We will use a sliding window to solve this problem. The window will be a substring of the input string. The window will be valid if it has at most k distinct characters. We will keep track of the maximum length of the valid window.

```python
class Solution:
    def lengthOfLongestSubstringKDistinct(self, s: str, k: int) -> int:
        count = collections.defaultdict(int)
        i, res = 0, 0
        for j, ch in enumerate(s):
            count[ch] += 1
            while len(count) > k:
                count[s[i]] -= 1
                if count[s[i]] == 0:
                    del count[s[i]]
                i += 1
            res = max(res, j-i+1)    
        return res
```

Time complexity: `O(n)` <br/> 
Space complexity: `O(n)`