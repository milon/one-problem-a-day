---
extends: _layouts.post
section: content
title: Predict the winner
problemUrl: https://leetcode.com/problems/predict-the-winner/
date: 2022-10-27
categories: [dynamic-programming]
---

We will take the maximum of the two possible choices for the current player. If the current player chooses the leftmost element, the next player will choose the maximum of the two possible choices for the next player. If the current player chooses the rightmost element, the next player will choose the maximum of the two possible choices for the next player. The base case is when there is only one element left, the current player will choose it.

```python
class Solution:
    def PredictTheWinner(self, nums: List[int]) -> bool:
        def winner(i, j, memo):
            if (i, j) in memo:
                return memo[(i, j)]
            if i == j:
                return nums[i]
            
            memo[(i, j)] = max(nums[i]-winner(i+1, j, memo), nums[j]-winner(i, j-1, memo))
            return memo[(i, j)]
        
        return winner(0, len(nums)-1, {}) >= 0
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`