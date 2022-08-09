---
extends: _layouts.post
section: content
title: Merge triplets to form target triplet
problemUrl: https://leetcode.com/problems/merge-triplets-to-form-target-triplet/
date: 2022-08-09
categories: [greedy]
---

We will iterate through all the triplets and if we found any of the items are greater than the value of target triplet, we ignore it from the consideration. Then we check if we found a value which is equal to target triplet value, we will add the index to a good set, so we don't duplicate the index. After the iteration is done, if number of index in the good set is equal to 3, then it's possible to construct the target triplet.

```python
class Solution:
    def mergeTriplets(self, triplets: List[List[int]], target: List[int]) -> bool:
        good = set()
        
        for t in triplets:
            if t[0] > target[0] or t[1] > target[1] or t[2] > target[2]:
                continue
            for i, val in enumerate(t):
                if val == target[i]:
                    good.add(i)
                    
        return len(good) == 3
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`