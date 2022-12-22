---
extends: _layouts.post
section: content
title: Sum of distances in tree
problemUrl: https://leetcode.com/problems/sum-of-distances-in-tree/
date: 2022-12-22
categories: [tree]
---

We will create a tree from the edges. We will create a `sums` array to store the sum of distances from each node to all other nodes. We will create a `counts` array to store the number of nodes in the subtree rooted at each node. We will create a `res` array to store the final result. We will create a `dfs` function to calculate the `sums` and `counts` arrays. We will create a `dfs2` function to calculate the `res` array. We will return the `res` array.

```python
class Solution:
    def sumOfDistancesInTree(self, n: int, edges: List[List[int]]) -> List[int]:
        tree = collections.defaultdict(set)
        res = [0] * n
        count = [1] * n

        for i, j in edges:
            tree[i].add(j)
            tree[j].add(i)

        def dfs(root, pre):
            for i in tree[root]:
                if i != pre:
                    dfs(i, root)
                    count[root] += count[i]
                    res[root] += res[i] + count[i]

        def dfs2(root, pre):
            for i in tree[root]:
                if i != pre:
                    res[i] = res[root] - count[i] + n - count[i]
                    dfs2(i, root)

        dfs(0, -1)
        dfs2(0, -1)
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
