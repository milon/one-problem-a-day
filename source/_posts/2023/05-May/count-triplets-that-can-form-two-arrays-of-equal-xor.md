---
extends: _layouts.post
section: content
title: Count triplets that can form two arrays of equal xor
problemUrl: https://leetcode.com/problems/count-triplets-that-can-form-two-arrays-of-equal-xor/
date: 2023-05-13
categories: [bit-manipulation]
---

We will calculate the prefix xor for each index. Then we will iterate over all possible pairs of indices and check if the xor of the prefix xors of the two indices is 0. If it is, we will increment the result by 1. Finally, we will return the result.

```python
class Solution:
    def countTriplets(self, arr: List[int]) -> int:
        prefix_xor = [0]
        for num in arr:
            prefix_xor.append(prefix_xor[-1] ^ num)
        
        res = 0
        for i in range(len(arr)):
            for j in range(i+1, len(arr)):
                if prefix_xor[i] ^ prefix_xor[j+1] == 0:
                    res += j-i
        
        return res
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n)`

We can memoize the result of the inner loop to improve the time complexity.

```python
class Solution:
    def countTriplets(self, arr: List[int]) -> int:
        prefix = {0: [-1,1]}
        res, cur = 0, 0
        for i, v in enumerate(arr):
            cur ^= v
            idxSum, cnt = prefix.get(cur, [0,0])
            res += i*cnt-idxSum-cnt
            prefix[cur] = [idxSum+i, cnt+1]
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`