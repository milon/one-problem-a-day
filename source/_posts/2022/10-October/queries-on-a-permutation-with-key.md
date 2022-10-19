---
extends: _layouts.post
section: content
title: Queries on a permutation with key
problemUrl: https://leetcode.com/problems/queries-on-a-permutation-with-key/
date: 2022-10-19
categories: [array-and-hashmap]
---

We will do the simulation. Fist we will create a list with all the permutation. For each query, we will find the index of the query value in the permutation, then we will move the value to the front of the permutation and add the index to the result.

```python
class Solution:
    def processQueries(self, queries: List[int], m: int) -> List[int]:
        res = []
        mList = [i for i in range(1, m+1)]
        
        for num in queries:
            res.append(mList.index(num))
            
            mList.remove(num)
            mList.insert(0, num)
        
        return res
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`