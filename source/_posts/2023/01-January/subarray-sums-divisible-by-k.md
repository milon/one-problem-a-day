---
extends: _layouts.post
section: content
title: Subarray sums divisible by k
problemUrl: https://leetcode.com/problems/subarray-sums-divisible-by-k/
date: 2023-01-19
categories: [array-and-hashmap]
---

We are using the prefix sum and the remainder of the sum divided by k to solve this problem. The idea is that if the remainder of the sum of the subarray is the same, then the sum of the subarray is divisible by k. For example, if the sum of the subarray is 6, and k is 3, then the remainder is 0, and the sum of the subarray is divisible by k.

```python
class Solution:
    def subarraysDivByK(self, nums: List[int], k: int) -> int:
        freq = collections.defaultdict(int)
        freq[0] = 1
        
        res = prefixSum = 0
        for num in nums:
            prefixSum += num
            remainder = prefixSum % k
            res += freq[remainder]
            freq[remainder] += 1
        
        return res
```

Time complexity: `O(n)`, n is the length of the array. <br/>
Space complexity: `O(n)`