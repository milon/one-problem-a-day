---
extends: _layouts.post
section: content
title: Sum of subarray minimums
problemUrl: https://leetcode.com/problems/sum-of-subarray-minimums/
date: 2022-11-25
categories: [stack]
---

We can solve it by using stack. We can iterate over the array, and for each element, we can check if the stack is empty or the top of the stack is greater than the current element. If the stack is empty or the top of the stack is greater than the current element, we can push the index of the current element to the stack. If the stack is not empty and the top of the stack is less than the current element, we can pop the top of the stack. We can calculate the sum of the subarray minimums by using the formula `sum += (i - stack[-1]) * (stack[-1] - stack[-2]) * A[stack[-1]]`. We can return the sum of the subarray minimums.

```python
class Solution:
    def sumSubarrayMins(self, arr: List[int]) -> int:
        MOD, stack = 10**9+7, []
        res = 0
        for i in range(len(arr)):
            while stack and arr[i] <= arr[stack[-1]]:
                _id = stack.pop()
                l = stack[-1] if stack else -1
                r = i
                res += (r-_id) * (_id-l) * arr[_id]
                res %= MOD
            stack.append(i)
            
        while stack:
            _id = stack.pop()
            l = stack[-1] if stack else -1
            r = len(arr)
            res += (r-_id) * (_id-l) * arr[_id]
            res %= MOD
        
        return res
```

Time complexity: `O(n)`, n is the length of arr <br/>
Space complexity: `O(n)`