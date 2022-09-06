---
extends: _layouts.post
section: content
title: Query kth smallest trimmed number
problemUrl: https://leetcode.com/problems/query-kth-smallest-trimmed-number/
date: 2022-09-06
categories: [heap]
---

We will take the nums, iterate over each query, and take the last trim values of the nums and store it as integer in a values array along with the index. Then we sort this values array and take the kth value and append it to our result. After the iteration of the queries are done, we return the result.

```python
class Solution:
    def smallestTrimmedNumbers(self, nums: List[str], queries: List[List[int]]) -> List[int]:
        res = []
        for k, trim in queries:
            values = [(int(num[-trim:]), i) for i, num in enumerate(nums)]
            _, idx = sorted(values, key=lambda x: x[0])[k-1]
            res.append(idx)
        return res
```

Time Complexity: `O(q*nlog(n))`, q is the number of queries, n is the number of elements in nums <br/>
Space Complexity: `O(n)`