---
extends: _layouts.post
section: content
title: Delete columns to make sorted
problemUrl: https://leetcode.com/problems/delete-columns-to-make-sorted/
date: 2023-01-03
categories: [array-and-hashmap]
---

We will iterate over the columns and for each column we will check if the column is sorted. If it is not, we will increment the number of columns to delete. Finally, we will return the number of columns to delete.

```python
class Solution:
    def minDeletionSize(self, strs: List[str]) -> int:
        res = 0
        for col in zip(*strs):
            if any(col[i] > col[i+1] for i in range(len(col)-1)):
                res += 1
        return res
```

Time complexity: `O(nm)` <br/>
Space complexity: `O(1)`

We can achieve the same result with a single loop:

```python
class Solution:
    def minDeletionSize(self, strs: List[str]) -> int:
        res = 0
        for col in zip(*strs):
            if col != tuple(sorted(col)):
                res += 1
        return res
```