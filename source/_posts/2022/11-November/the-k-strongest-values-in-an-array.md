---
extends: _layouts.post
section: content
title: The k strongest values in an array
problemUrl: https://leetcode.com/problems/the-k-strongest-values-in-an-array/
date: 2022-11-05
categories: [array-and-hashmap]
---

We will calture the median of the array, and then use two pointers to find the k strongest values.

```python
class Solution:
    def getStrongest(self, arr: List[int], k: int) -> List[int]:
        arr.sort()
        median = arr[(len(arr)-1)//2]
        res = []
        i, j = 0, len(arr)-1
        while len(res) < k:
            if abs(arr[i]-median) > abs(arr[j]-median):
                res.append(arr[i])
                i += 1
            else:
                res.append(arr[j])
                j -= 1
        return res
```

Time Complexity: `O(nlogn)` <br/>
Space Complexity: `O(1)`