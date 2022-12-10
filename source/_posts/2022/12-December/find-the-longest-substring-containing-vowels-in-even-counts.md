---
extends: _layouts.post
section: content
title: Find the longest substring containing vowels in even counts
problemUrl: https://leetcode.com/problems/find-the-longest-substring-containing-vowels-in-even-counts/
date: 2022-12-10
categories: [array-and-hashmap]
---

We will use a sliding window to solve this problem. We will keep track of the number of occurrences of each vowel in the window. We will then check if the number of occurrences of each vowel is even. If it is, we will update the answer.

```python
class Solution:
    def findTheLongestSubstring(self, s: str) -> int:
        lookup = collections.defaultdict(lambda: sys.maxsize)
        cur = (0, 0, 0, 0, 0)                            
        res = lookup[cur] = -1                                
        vowel = {'a': 0, 'e': 1, 'i': 2, 'o': 3, 'u': 4}
        
        for i, c in enumerate(s):
            if c in vowel:
                idx = vowel[c]
                cur = cur[:idx] + (1-cur[idx],) + cur[idx+1:]
            
            if lookup[cur] == sys.maxsize: 
                lookup[cur] = i
            
            res = max(res, i - lookup[cur])
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`
