---
extends: _layouts.post
section: content
title: Largest values from labels
problemUrl: https://leetcode.com/problems/largest-values-from-labels/
date: 2022-12-22
categories: [greedy]
---

We will use a greedy approach to solve this problem. We will sort the values in descending order and then iterate over the values. We will keep track of the number of items with each label. We will add the value to the result if the number of items with the label is less than the maximum allowed number of items with the label. We will return the result.

```python
class Solution:
    def largestValsFromLabels(self, values: List[int], labels: List[int], numWanted: int, useLimit: int) -> int:
        items = sorted(zip(values, labels), reverse=True)
        res = 0
        counter = defaultdict(int)

        for value, label in items:
            if counter[label] < useLimit:
                res += value
                counter[label] += 1
                numWanted -= 1

            if numWanted == 0:
                break

        return res
```

Time complexity: `O(nlogn)` <br/>
Space complexity: `O(n)`