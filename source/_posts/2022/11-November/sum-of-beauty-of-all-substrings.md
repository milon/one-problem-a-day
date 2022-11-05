---
extends: _layouts.post
section: content
title: Sum of beauty of all substrings
problemUrl: https://leetcode.com/problems/sum-of-beauty-of-all-substrings/
date: 2022-11-05
categories: [array-and-hashmap]
---

We will follow the problem statement, and solve the problem with a brute force approach.

```python
class Solution:
    def beautySum(self, s: str) -> int:
        res = 0
        for i in range(len(s)-1):
            count = collections.defaultdict(int)
            count[s[i]] += 1
            
            for j in range(i+1, len(s)):
                count[s[j]] += 1
                res += max(count.values()) - min(count.values())
        
        return res
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`
