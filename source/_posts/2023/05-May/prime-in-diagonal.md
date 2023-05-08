---
extends: _layouts.post
section: content
title: Prime in diagonal
problemUrl: https://leetcode.com/problems/prime-in-diagonal/
date: 2023-05-08
categories: [array-and-hashmap]
---

We will start our initial result with 0. Then we will iterate over the matrix and check if the current diagonal element is a prime number. If it is, we will keep the maximum between current result and the diagonal element as result. Finally, we will return the result.

```python
class Solution:
    def diagonalPrime(self, nums: List[List[int]]) -> int:
        def isPrime(num: int) -> bool:
            if num < 2: return False
            if num == 2: return True
            if num % 2 == 0: return False
            for i in range(3, floor(sqrt(num))+1, 2):
                if num % i == 0:
                    return False
            return True
        
        res = 0
        length = len(nums)
        for i in range(length):
            if isPrime(nums[i][i]):
                res = max(res, nums[i][i])
            if isPrime(nums[i][length-i-1]):
                res = max(res, nums[i][length-i-1])
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`