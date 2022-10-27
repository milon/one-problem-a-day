---
extends: _layouts.post
section: content
title: XOR queries of a subarray
problemUrl: https://leetcode.com/problems/xor-queries-of-a-subarray/
date: 2022-10-27
categories: [bit-manipulation]
---

We will in-place calculate the prefix XOR of input array. For each query [i, j], if i == 0, query result = array[j], if i != 0, query result = array[i-1] ^ array[j].

```python
class Solution:
    def xorQueries(self, arr: List[int], queries: List[List[int]]) -> List[int]:
        for i in range(len(arr)-1):
            arr[i+1] ^= arr[i]
        return [arr[j] ^ arr[i-1] if i else arr[j] for i, j in queries]
```

Time complexity: O(n) <br/>
Space complexity: O(1)