---
extends: _layouts.post
section: content
title: Previous permutation with one swap
problemUrl: https://leetcode.com/problems/previous-permutation-with-one-swap/
date: 2022-12-02
categories: [greedy]
---

We will iterate through the array from the end. We will keep track of the index of the first element that is smaller than the previous element. We will then iterate through the array from the end. We will keep track of the index of the first element that is smaller than the element at the index we found in the previous step. We will then swap the two elements and return the array.

```python
class Solution:
    def prevPermOpt1(self, arr: List[int]) -> List[int]:
        n = len(arr)
        for i in range(n-2, -1, -1):
            if arr[i] > arr[i+1]:
                for j in range(n-1, i, -1):
                    if arr[j] < arr[i] and (j == i-1 or arr[j] != arr[j-1]):
                        arr[i], arr[j] = arr[j], arr[i]
                        return arr
        return arr
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`