---
extends: _layouts.post
section: content
title: Count good meals
problemUrl: https://leetcode.com/problems/count-good-meals/
date: 2022-12-23
categories: [array-and-hashmap]
---

We will use a hashmap to solve this problem. We will iterate over the `deliciousness` array and for each element, we will check if the element is a power of two. If it is, we will add the element to the hashmap. If it is not, we will check if the element is a power of two minus the element in the hashmap. If it is, we will add the element to the hashmap. We will return the result.

```python
class Solution:
    def countPairs(self, deliciousness: List[int]) -> int:
        count = collections.Counter()
        res = 0
        for d in deliciousness:
            for i in range(22):
                res += count[2**i - d]
            count[d] += 1
        return res % (10**9+7)
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`
