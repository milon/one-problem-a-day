---
extends: _layouts.post
section: content
title: The k weakest rows in a matrix
problemUrl: https://leetcode.com/problems/the-k-weakest-rows-in-a-matrix/
date: 2022-08-20
categories: [heap]
---

First we iterate through the whole matrix to count the number of 1's in the matrix and put it in an min heap. Then we extract top k elements from that heap.

```python
class Solution:
    def kWeakestRows(self, mat: List[List[int]], k: int) -> List[int]:
        count = []
        for r in range(len(mat)):
            cur = 0
            for c in range(len(mat[0])):
                if mat[r][c] == 1:
                    cur += 1
            count.append((cur, r))
        return [idx for cnt, idx in heapq.nsmallest(k, count)]
```

Time Complexity: `O(n*m*log(k))`, n is the number of rows, m is the number of colums int the matrix. <br/>
Space Complexity: `O(n)`
