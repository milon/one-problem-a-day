---
extends: _layouts.post
section: content
title: Sum of all subset xor totals
problemUrl: https://leetcode.com/problems/sum-of-all-subset-xor-totals/
date: 2022-12-31
categories: [backtracking]
---

We will use backtracking to solve this problem. We will start from the first element and then we will add it to the current subset and then we will call the function again with the next element. Then we will remove the current element from the subset and call the function again with the next element. We will do this until we reach the end of the array. Then we will calculate the xor of the current subset and add it to the result. Finally we will return the result.

```python
class Solution:
    def subsetXORSum(self, nums: List[int]) -> int:
        n = len(nums)
        self.res = 0
        
        def dfs(pos, curr):
            if pos == n:
                self.res += curr
                return 

            dfs(pos+1, curr^nums[pos])  # take
            dfs(pos+1, curr)            # skip

        dfs(0, 0)
        return self.res
```

Time complexity: `O(n*2^n)` <br/>
Space complexity: `O(n)`