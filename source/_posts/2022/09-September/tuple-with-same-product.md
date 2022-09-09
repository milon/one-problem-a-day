---
extends: _layouts.post
section: content
title: Tuple with same product
problemUrl: https://leetcode.com/problems/tuple-with-same-product/
date: 2022-09-09
categories: [array-and-hashmap]
---

We will first count the product of 2 elements to a hashmap, where the key will be product. Then we iterate over each product, if it is more than 1, then we calculate the number of tuple by `(n*(n-1)/2)*8`. 

Each product value represents 2 tuples, which means there are 2 possibilities in permutation. Meanwhile, each tuple can has 2 possibilities of permutation. The total is 2*2*2 = 8 possibilities. Also, we need to select 2 tuples in n candidates, which is n*(n-1)/2. Putting everthing together, it is (n*(n-1)/2)*8.

```python
class Solution:
    def tupleSameProduct(self, nums: List[int]) -> int:
        lookup = collections.defaultdict(int)
        for i in range(len(nums)-1):
            for j in range(i+1, len(nums)):
                lookup[nums[i]*nums[j]] += 1
        
        res = 0
        for key, val in lookup.items():
            if val == 1:
                continue
            res += ((val*(val-1))//2)*8
        
        return res
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n^2)`