---
extends: _layouts.post
section: content
title: Candy
problemUrl: https://leetcode.com/problems/candy/
date: 2023-01-21
categories: [array-and-hashmap]
---

Go from left to right and while increase, give the the next person +1 candy from previous, if not, leave number of candies as it was. In this way when we make this pass we make sure that condition that person with bigger value gets more candies fulfilled for pairs of adjusent persons where left person is smaller than right. Now, go from right to left and do the same: now we cover pairs of adjacent persons where right is smaller than left. After these two passes all persons are happy.

```python
class Solution:
    def candy(self, ratings: List[int]) -> int:
        n = len(ratings)
        res = [1] * n
        
        for i in range(n-1):
            if ratings[i] < ratings[i+1]:
                res[i+1] = 1 + res[i]
                
        for i in range(n-2, -1, -1):
            if ratings[i+1] < ratings[i]:
                res[i] = max(1 + res[i+1], res[i])
        
        return sum(res)     
```

Time complexity: `O(n)`, n is the length of the array. <br/>
Space complexity: `O(n)`